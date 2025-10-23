import { BrowserRouter, Routes, Route, Navigate } from 'react-router-dom';
import PackageList from './components/PackageList/PackageList';
import PackageSingle from './components/PackageSingle/PackageSingle';

const App = () => {
  return (
    <BrowserRouter basename="/packages">
      <div className="min-h-screen bg-white dark:bg-slate-900 py-12">
        <Routes>
          <Route path="/" element={<PackageList />} />
          <Route path="/:slug" element={<PackageSingle />} />
          <Route path="*" element={<Navigate to="/" replace />} />
        </Routes>
      </div>
    </BrowserRouter>
  );
};

export default App;
