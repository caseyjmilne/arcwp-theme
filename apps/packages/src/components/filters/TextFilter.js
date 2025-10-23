import { createElement } from '@wordpress/element';

const TextFilter = ({ filter, value, onChange }) => {
  const { label, placeholder } = filter;

  return createElement('div', { className: 'flex flex-col gap-2 flex-1' },
    label && createElement('label', {
      className: 'text-sm font-medium text-slate-900 dark:text-slate-50'
    }, label),
    createElement('input', {
      type: 'text',
      value: value || '',
      onChange: (e) => onChange(e.target.value),
      placeholder: placeholder || 'Search...',
      className: 'px-3 py-2 border border-slate-300 dark:border-slate-700 rounded-md bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-50 placeholder-slate-500 dark:placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-600'
    })
  );
};

export default TextFilter;
