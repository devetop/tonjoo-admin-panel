import { clsx } from "clsx";
import { twMerge } from "tailwind-merge"

export function cn(...inputs) {
  return twMerge(clsx(inputs));
}

export const buildQueryParams = (params) => {
  try {
    const queryParts = [];
    
    // Detect param types from the first valid value
    const paramTypes = Object.entries(params).reduce((acc, [key, value]) => {
      if (value !== undefined && value !== null) {
        if (Array.isArray(value)) {
          acc.arrayParams.push(key);
        } else {
          acc.stringParams.push(key);
        }
      }
      return acc;
    }, { stringParams: [], arrayParams: [] });

    // Handle string params
    paramTypes.stringParams.forEach(param => {
      if (params[param]) {
        queryParts.push(`${param}=${encodeURIComponent(params[param])}`);
      }
    });

    // Handle array params
    paramTypes.arrayParams.forEach(param => {
      if (Array.isArray(params[param]) && params[param].length > 0) {
        params[param].forEach(value => {
          queryParts.push(`${param}[]=${encodeURIComponent(value)}`);
        });
      }
    });

    return queryParts.join('&');
  } catch (e) {
    console.error('Error building query params:', e);
    return '';
  }
};

export const parseQueryParams = (queryString = window?.document?.location?.search || '') => {
  try {
    const params = new URLSearchParams(queryString);
    const result = {};

    params.forEach((value, key) => {
      if (key.endsWith('[]')) {
        const arrayKey = key.slice(0, -2);
        if (!result[arrayKey]) {
          result[arrayKey] = [];
        }
        result[arrayKey].push(value);
      } else {
        result[key] = value;
      }
    });

    return result;
  } catch (e) {
    console.error('Error parsing query string:', e);
    return {};
  }
};