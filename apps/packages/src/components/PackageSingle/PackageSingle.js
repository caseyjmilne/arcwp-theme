import { useState, useEffect } from 'react';
import { useParams, Link } from 'react-router-dom';
import { fetchPackageBySlug } from '../../services/api';
import useMediaFile from '../../hooks/useMediaFile';

const PackageSingle = () => {
  const { slug } = useParams();
  const [pkg, setPkg] = useState(null);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  // Fetch release file if available
  const { file: releaseFile, loading: fileLoading } = useMediaFile(pkg?.release_file);

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
    plugins: 'bg-orange-600 text-slate-50',
    react: 'bg-slate-50 dark:bg-slate-900 border border-slate-900 dark:border-slate-50 text-slate-900 dark:text-slate-50',
    themes: 'bg-slate-50 dark:bg-slate-900 border border-slate-900 dark:border-slate-50 text-slate-900 dark:text-slate-50',
  };

  // Format file size helper
  const formatFileSize = (bytes) => {
    if (!bytes) return '';
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(1024));
    return Math.round(bytes / Math.pow(1024, i) * 100) / 100 + ' ' + sizes[i];
  };

  // Handle download with proper filename
  const handleDownload = () => {
    if (!releaseFile) return;

    const link = document.createElement('a');
    link.href = releaseFile.url;
    link.download = releaseFile.filename || `${slug}-${version}.zip`;
    link.target = '_blank';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
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

        {/* Release File Download Section */}
        {pkg.release_file && (
          <div className="mt-8 pt-8 border-t border-slate-300 dark:border-slate-700">
            <h2 className="text-2xl font-semibold text-slate-900 dark:text-slate-50 mb-4">
              Download
            </h2>

            {fileLoading ? (
              <div className="flex items-center gap-3 p-4 bg-slate-100 dark:bg-slate-800 rounded-lg">
                <div className="text-slate-600 dark:text-slate-400">
                  Loading file information...
                </div>
              </div>
            ) : releaseFile ? (
              <div className="flex items-start justify-between gap-4 p-4 bg-slate-100 dark:bg-slate-800 rounded-lg border border-slate-200 dark:border-slate-700">
                <div className="flex-1">
                  <div className="flex items-center gap-3 mb-2">
                    <svg
                      className="w-8 h-8 text-slate-600 dark:text-slate-400"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        fillRule="evenodd"
                        d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z"
                        clipRule="evenodd"
                      />
                    </svg>
                    <div>
                      <h3 className="font-semibold text-slate-900 dark:text-slate-50">
                        {releaseFile.filename}
                      </h3>
                      {releaseFile.filesize && (
                        <p className="text-sm text-slate-600 dark:text-slate-400">
                          {formatFileSize(releaseFile.filesize)}
                        </p>
                      )}
                    </div>
                  </div>
                </div>

                <button
                  onClick={handleDownload}
                  className="inline-flex items-center gap-2 px-6 py-3 bg-orange-600 hover:bg-orange-700 text-white font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md"
                >
                  <svg
                    className="w-5 h-5"
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
                </button>
              </div>
            ) : (
              <div className="p-4 bg-slate-100 dark:bg-slate-800 rounded-lg text-slate-600 dark:text-slate-400">
                Release file not available
              </div>
            )}
          </div>
        )}
      </div>
    </div>
  );
};

export default PackageSingle;
