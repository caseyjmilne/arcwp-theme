import { createElement } from '@wordpress/element';
import SelectFilter from './SelectFilter';
import TextFilter from './TextFilter';

const Filter = ({ filter, value, onChange }) => {
  const { type } = filter;

  switch (type) {
    case 'select':
      return createElement(SelectFilter, { filter, value, onChange });
    case 'text':
      return createElement(TextFilter, { filter, value, onChange });
    default:
      return null;
  }
};

export default Filter;
