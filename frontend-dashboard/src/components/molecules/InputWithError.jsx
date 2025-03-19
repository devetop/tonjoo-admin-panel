import * as React from 'react';

import { Input } from '../ui/input';
import { Label } from '../ui/label';
import { cn } from '@/lib/utils';

const InputWithError = React.forwardRef(
  ({ label, error, className, type, isVertical=false, formClass, inputClass, ...props }, ref) => {
    const id = React.useId();
    return (
      <div className={isVertical ? '' : cn('grid grid-cols-8 items-start gap-4',formClass)}>
        {label && <Label htmlFor={`${props.name}-${id}`} className={isVertical ? '' : 'col-span-1 text-left'}>
          {label}
        </Label>}
        <div className={isVertical ? '' : cn('col-span-7',inputClass)}>
          <Input
            id={`${props.name}-${id}`}
            className={cn(
              className,
              error ? 'border-red-500 focus-visible:ring-red-500' : ''
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

InputWithError.displayName = 'InputWithError';

export { InputWithError };
