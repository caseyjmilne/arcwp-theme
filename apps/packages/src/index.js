import { createRoot } from 'react-dom/client';
import App from './App';

const init = () => {
  const rootElement = document.getElementById('arcwp-packages-root');
  if (rootElement) {
    const root = createRoot(rootElement);
    root.render(<App />);
  }
};

if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', init);
} else {
  init();
}
