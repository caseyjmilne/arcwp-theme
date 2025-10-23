import { useState, useEffect, useMemo } from 'react';
import { fetchPackages } from '../../services/api';
import PackageCard from '../PackageCard/PackageCard';
import Filters from '../filters/Filters';
import Filter from '../filters/Filter';

const PackageList = () => {
  const [packages, setPackages] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  const [filterValues, setFilterValues] = useState({
    type: '',
    search: ''
  });

  const filters = [
    {
      type: 'text',
      field: 'search',
      label: 'Search',
      placeholder: 'Search packages...'
    },
    {
      type: 'select',
      field: 'type',
      label: 'Type',
      placeholder: 'All Types',
      choices: [
        { value: 'plugins', label: 'Plugins' },
        { value: 'react', label: 'React' },
        { value: 'themes', label: 'Themes' },
      ]
    }
  ];

  useEffect(() => {
    const loadPackages = async () => {
      try {
        setLoading(true);
        const data = await fetchPackages();
        setPackages(Array.isArray(data) ? data : []);
        setError(null);
      } catch (err) {
        setError(`Failed to load packages: ${err.message}`);
        console.error('Error loading packages:', err);
        setPackages([]);
      } finally {
        setLoading(false);
      }
    };

    loadPackages();
  }, []);

  const filteredPackages = useMemo(() => {
    let filtered = packages;

    if (filterValues.type) {
      filtered = filtered.filter(pkg => pkg.type === filterValues.type);
    }

    if (filterValues.search) {
      const searchLower = filterValues.search.toLowerCase();
      filtered = filtered.filter(pkg =>
        pkg.title?.toLowerCase().includes(searchLower) ||
        pkg.summary?.toLowerCase().includes(searchLower) ||
        pkg.description?.toLowerCase().includes(searchLower)
      );
    }

    return filtered;
  }, [packages, filterValues]);

  const handleFilterChange = (field, value) => {
    setFilterValues(prev => ({ ...prev, [field]: value }));
  };

  if (loading) {
    return (
      <div className="flex items-center justify-center p-12">
        <div className="text-slate-600 dark:text-slate-400">
          Loading packages...
        </div>
      </div>
    );
  }

  if (error) {
    return (
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="p-6 bg-red-100 dark:bg-red-900 border border-red-300 dark:border-red-700 rounded-lg">
          <h3 className="text-red-900 dark:text-red-100 font-semibold mb-2">Error</h3>
          <p className="text-red-800 dark:text-red-200">{error}</p>
        </div>
      </div>
    );
  }

  return (
    <div>
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
        <h1 className="text-4xl font-bold text-slate-900 dark:text-slate-50 mb-2">
          Packages
        </h1>
        <p className="text-slate-600 dark:text-slate-400">
          Browse our collection of WordPress plugins, themes, and React components
        </p>
      </div>

      <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        <Filters direction="row">
          {filters.map(filter => (
            <Filter
              key={filter.field}
              filter={filter}
              value={filterValues[filter.field]}
              onChange={(value) => handleFilterChange(filter.field, value)}
            />
          ))}
        </Filters>

        <div className="text-sm text-slate-600 dark:text-slate-400">
          {filteredPackages.length} package{filteredPackages.length !== 1 ? 's' : ''} found
        </div>

        {filteredPackages.length > 0 ? (
          <div className="space-y-6">
            {filteredPackages.map(pkg => (
              <PackageCard key={pkg.id || pkg.slug} package={pkg} />
            ))}
          </div>
        ) : (
          <div className="text-center p-12 bg-slate-50 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 rounded-lg">
            <p className="text-slate-600 dark:text-slate-400">
              No packages found matching your criteria
            </p>
          </div>
        )}
      </div>
    </div>
  );
};

export default PackageList;
