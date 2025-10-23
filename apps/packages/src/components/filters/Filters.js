import { createElement } from '@wordpress/element';

const Filters = ({ children, direction = 'row' }) => {
  const className = direction === 'row'
    ? 'flex flex-wrap gap-4 items-end'
    : 'flex flex-col gap-4';

  return createElement('div', { className }, children);
};

export default Filters;
