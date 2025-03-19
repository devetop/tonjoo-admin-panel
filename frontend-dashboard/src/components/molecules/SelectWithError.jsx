import * as React from "react"

import { Label } from "../ui/label";
import { cn } from "@/lib/utils";
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from "../ui/select";
import { Controller } from "react-hook-form"

const SelectWithError = React.forwardRef(({ label, error, className, options, placeholder, name, control }, ref) => {
  const id = React.useId()
  return (
    <div>
      <Label htmlFor={`${name}-${id}`}>{label}</Label>
      <Controller
        control={control}
        name={name}
        render={({ field }) => (
          <Select
            id={`${name}-${id}`}
            onValueChange={field.onChange} value={field.value} ref={ref}
            className={cn(className, error ? 'border-red-500 focus-visible:ring-red-500' : '')}
          >
            <SelectTrigger className="w-full text-gray-500">
              <SelectValue placeholder={placeholder} />
            </SelectTrigger>
            <SelectContent>
              {
                Object.keys(options).map((key) => (
                  <SelectItem key={key} value={key}>{options[key]}</SelectItem>
                ))
              }
            </SelectContent>
          </Select>
        )}
      />
      {
        error && <p className="mt-1 text-xs text-red-500">{error}</p>
      }
    </div>
  );
})

SelectWithError.displayName = "SelectWithError"


export { SelectWithError }