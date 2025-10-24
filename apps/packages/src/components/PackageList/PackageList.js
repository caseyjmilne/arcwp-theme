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
      type: 'select',
      field: 'type',
      label: 'Type',
      placeholder: 'All Types',
      choices: [
        { value: 'plugins', label: 'Plugins' },
        { value: 'react', label: 'React' },
        { value: 'themes', label: 'Themes' },
      ],
      className: 'min-w-[200px]'
    },
    {
      type: 'text',
      field: 'search',
      label: 'Search',
      placeholder: 'Search packages...'
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
      <div className="min-h-[80vh]">
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
          <div className="h-12 w-64 bg-slate-200 dark:bg-slate-800 rounded animate-pulse mb-2"></div>
          <div className="h-6 w-96 bg-slate-200 dark:bg-slate-800 rounded animate-pulse"></div>
        </div>

        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
          {/* Filters Skeleton */}
          <div className="flex gap-4">
            <div className="min-w-[200px] h-12 bg-slate-200 dark:bg-slate-800 rounded animate-pulse"></div>
            <div className="flex-1 h-12 bg-slate-200 dark:bg-slate-800 rounded animate-pulse"></div>
          </div>

          {/* Count Skeleton */}
          <div className="h-5 w-32 bg-slate-200 dark:bg-slate-800 rounded animate-pulse"></div>

          {/* Package Cards Skeleton */}
          <div className="space-y-6">
            {[1, 2, 3, 4, 5].map((i) => (
              <div
                key={i}
                className="bg-slate-50 dark:bg-slate-900 border-2 border-slate-200 dark:border-slate-800 rounded-xl p-6 animate-pulse"
              >
                <div className="flex items-start justify-between mb-4">
                  <div className="flex-1">
                    <div className="h-7 w-3/4 bg-slate-200 dark:bg-slate-800 rounded mb-3"></div>
                    <div className="h-5 w-1/4 bg-slate-200 dark:bg-slate-800 rounded"></div>
                  </div>
                  <div className="w-20 h-6 bg-slate-200 dark:bg-slate-800 rounded"></div>
                </div>
                <div className="space-y-2">
                  <div className="h-4 w-full bg-slate-200 dark:bg-slate-800 rounded"></div>
                  <div className="h-4 w-5/6 bg-slate-200 dark:bg-slate-800 rounded"></div>
                </div>
              </div>
            ))}
          </div>
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
      <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mb-8">
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
