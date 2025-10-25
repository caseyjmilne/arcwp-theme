import { useState, useEffect } from 'react';
import apiClient from '../services/api';

/**
 * Custom hook to fetch media file details from WordPress
 * @param {number} attachmentId - WordPress media attachment ID
 * @returns {Object} { file, loading, error }
 */
const useMediaFile = (attachmentId) => {
  const [file, setFile] = useState(null);
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState(null);

  useEffect(() => {
    if (!attachmentId) {
      setFile(null);
      setLoading(false);
      setError(null);
      return;
    }

    const fetchFileData = async () => {
      try {
        setLoading(true);
        setError(null);

        const response = await apiClient.get(`wp/v2/media/${attachmentId}`);
        const media = response.data;

        setFile({
          id: media.id,
          url: media.source_url,
          filename: media.title?.rendered || 'Download',
          filesize: media.media_details?.filesize,
          mime_type: media.mime_type,
          date: media.date,
        });
      } catch (err) {
        console.error('Error fetching media file:', err);
        setError(err.message || 'Failed to fetch file');
        setFile(null);
      } finally {
        setLoading(false);
      }
    };

    fetchFileData();
  }, [attachmentId]);

  return { file, loading, error };
};

export default useMediaFile;
