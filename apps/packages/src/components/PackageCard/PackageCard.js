import { Link } from 'react-router-dom';

const PackageCard = ({ package: pkg }) => {
  const { title, slug, type, summary, version, release_file } = pkg;

  const typeColors = {
    plugins: 'bg-orange-600 text-slate-50',
    react: 'bg-slate-50 dark:bg-slate-900 border border-slate-900 dark:border-slate-50 text-slate-900 dark:text-slate-50',
    themes: 'bg-slate-50 dark:bg-slate-900 border border-slate-900 dark:border-slate-50 text-slate-900 dark:text-slate-50',
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
        <div className="flex items-center gap-2 text-sm text-slate-600 dark:text-slate-400 mb-3">
          <span>Version {version}</span>
          {release_file && (
            <span className="inline-flex items-center gap-1 px-2 py-0.5 bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-400 text-xs font-medium rounded">
              <svg
                className="w-3 h-3"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  strokeLinecap="round"
                  strokeLinejoin="round"
                  strokeWidth={2}
                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"
                />
              </svg>
              Download
            </span>
          )}
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
