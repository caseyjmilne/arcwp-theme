import { createElement } from '@wordpress/element';

const SelectFilter = ({ filter, value, onChange }) => {
  const { label, placeholder, choices = [], className = '' } = filter;

  return createElement('div', { className: `flex flex-col gap-2 ${className}` },
    label && createElement('label', {
      className: 'text-sm font-medium text-slate-900 dark:text-slate-50'
    }, label),
    createElement('select', {
      value: value || '',
      onChange: (e) => onChange(e.target.value),
      className: 'px-3 py-2 border border-slate-300 dark:border-slate-700 rounded-md bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-50 focus:outline-none focus:ring-2 focus:ring-orange-600'
    },
      createElement('option', { value: '' }, placeholder || 'All'),
      choices.map((choice, index) =>
        createElement('option', {
          key: index,
          value: choice.value
        }, choice.label)
      )
    )
  );
};

export default SelectFilter;
