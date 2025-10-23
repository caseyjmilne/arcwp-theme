import { useState, useEffect } from 'react';
import { useParams, Link } from 'react-router-dom';
import { fetchPackageBySlug } from '../../services/api';

const PackageSingle = () => {
  const { slug } = useParams();
  const [pkg, setPkg] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    const loadPackage = async () => {
      try {
        setLoading(true);
        const data = await fetchPackageBySlug(slug);
        setPkg(data);
        setError(null);
      } catch (err) {
        setError(`Failed to load package: ${err.message}`);
        console.error('Error loading package:', err);
        setPkg(null);
      } finally {
        setLoading(false);
      }
    };

    loadPackage();
  }, [slug]);

  if (loading) {
    return (
      <div className="flex items-center justify-center p-12">
        <div className="text-slate-600 dark:text-slate-400">
          Loading package...
        </div>
      </div>
    );
  }

  if (error) {
    return (
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="p-6 bg-red-100 dark:bg-red-900 border border-red-300 dark:border-red-700 rounded-lg">
          <h3 className="text-red-900 dark:text-red-100 font-semibold mb-2">Error</h3>
          <p className="text-red-800 dark:text-red-200 mb-4">{error}</p>
          <Link
            to="/"
            className="inline-flex items-center text-sm font-medium text-orange-600 hover:text-orange-700 dark:hover:text-orange-500"
          >
            ← Back to packages
          </Link>
        </div>
      </div>
    );
  }

  if (!pkg) {
    return (
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center p-12">
          <p className="text-slate-600 dark:text-slate-400 mb-4">Package not found</p>
          <Link
            to="/"
            className="inline-flex items-center text-sm font-medium text-orange-600 hover:text-orange-700 dark:hover:text-orange-500"
          >
            ← Back to packages
          </Link>
        </div>
      </div>
    );
  }

  const { title, type, version, summary, description } = pkg;

  const typeColors = {
    plugins: 'bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200',
    react: 'bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200',
    themes: 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200',
  };

  return (
    <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
      <Link
        to="/"
        className="inline-flex items-center text-sm font-medium text-slate-600 dark:text-slate-400 hover:text-orange-600 dark:hover:text-orange-600 mb-4"
      >
        <svg
          className="mr-1 w-4 h-4"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            strokeLinecap="round"
            strokeLinejoin="round"
            strokeWidth={2}
            d="M15 19l-7-7 7-7"
          />
        </svg>
        Back to packages
      </Link>

      <div className="bg-slate-50 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 rounded-lg p-8">
        <div className="flex items-start justify-between mb-4">
          <h1 className="text-4xl font-bold text-slate-900 dark:text-slate-50">
            {title}
          </h1>
          {type && (
            <span className={`px-3 py-1 text-sm font-medium rounded ${typeColors[type] || typeColors.plugins}`}>
              {type.charAt(0).toUpperCase() + type.slice(1)}
            </span>
          )}
        </div>

        {version && (
          <div className="text-lg text-slate-600 dark:text-slate-400 mb-4">
            Version {version}
          </div>
        )}

        {summary && (
          <p className="text-xl text-slate-700 dark:text-slate-300 mb-6">
            {summary}
          </p>
        )}

        {description && (
          <div className="prose dark:prose-invert max-w-none">
            <h2 className="text-2xl font-semibold text-slate-900 dark:text-slate-50 mb-3">
              Description
            </h2>
            <div className="text-slate-700 dark:text-slate-300 whitespace-pre-wrap">
              {description}
            </div>
          </div>
        )}
      </div>
    </div>
  );
};

export default PackageSingle;
