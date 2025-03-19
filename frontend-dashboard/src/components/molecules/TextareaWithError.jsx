import * as React from 'react';

import { Label } from '../ui/label';
import { cn } from '@/lib/utils';
import { Textarea } from '../ui/textarea';

const TextareaWithError = React.forwardRef(
  (
    {
      label,
      error,
      className,
      isVertical = false,
      type,
      formClass,
      inputClass,
      ...props
    },
    ref
  ) => {
    const id = React.useId();
    return (
      <div
        className={
          isVertical
            ? ''
            : cn('grid grid-cols-8 items-start gap-4', formClass)
        }
      >
        {label && (
          <Label
            htmlFor={`${props.name}-${id}`}
            className={isVertical ? '' : 'text-left'}
          >
            {label}
          </Label>
        )}
        <div className={cn('col-span-7', inputClass)}>
          <Textarea
            id={`${props.name}-${id}`}
            className={cn(
              className,
              error ? 'border-red-500 focus-visible:ring-red-500' : '',
              props.disabled ? 'bg-gray-200' : ''
            )}
            type={type}
            ref={ref}
            {...props}
          />
          {error && (
            <p className='mt-1 text-xs text-red-500'>{error}</p>
          )}
        </div>
      </div>
    );
  }
);

TextareaWithError.displayName = 'TextareaWithError';

export { TextareaWithError };
