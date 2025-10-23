import { Link } from 'react-router-dom';

const PackageCard = ({ package: pkg }) => {
  const { title, slug, type, summary, version } = pkg;

  const typeColors = {
    plugins: 'bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200',
    react: 'bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200',
    themes: 'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200',
  };

  return (
    <div className="bg-slate-50 dark:bg-slate-900 border border-slate-300 dark:border-slate-700 rounded-lg p-6 hover:shadow-lg transition-shadow duration-200">
      <div className="flex items-start justify-between mb-3">
        <Link
          to={`/${slug}`}
          className="text-xl font-semibold text-slate-900 dark:text-slate-50 hover:text-orange-600 dark:hover:text-orange-600 transition-colors"
        >
          {title}
        </Link>
        {type && (
          <span className={`px-2 py-1 text-xs font-medium rounded ${typeColors[type] || typeColors.plugins}`}>
            {type.charAt(0).toUpperCase() + type.slice(1)}
          </span>
        )}
      </div>

      {version && (
        <div className="text-sm text-slate-600 dark:text-slate-400 mb-3">
          Version {version}
        </div>
      )}

      {summary && (
        <p className="text-slate-700 dark:text-slate-300 text-sm line-clamp-3 mb-4">
          {summary}
        </p>
      )}

      <Link
        to={`/${slug}`}
        className="inline-flex items-center text-sm font-medium text-orange-600 hover:text-orange-700 dark:hover:text-orange-500 transition-colors"
      >
        View Details
        <svg
          className="ml-1 w-4 h-4"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            strokeLinecap="round"
            strokeLinejoin="round"
            strokeWidth={2}
            d="M9 5l7 7-7 7"
          />
        </svg>
      </Link>
    </div>
  );
};

export default PackageCard;
