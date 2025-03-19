import { useState, useEffect } from "react";
import ReactDatePicker, { CalendarContainer } from "react-datepicker";
import "react-datepicker/dist/react-datepicker.css";
import "./datepicker.scss"

const Container = ({ className, children }) => {
  return (
    <div style={{ zIndex: 100, position: 'relative' }}>
      <CalendarContainer className={className}>
        {children}
      </CalendarContainer>
    </div>
  );
};

export default function DatePicker({ value, setValue, icon, error = null, disabled = false }) {
  const [date, setDate] = useState(new Date( value || (new Date()).toISOString().split('T')[0] ));

  const onChangeHandler = (value, e) => {
    setValue(value.toISOString().split('T')[0])
    setDate(value);
  };

  useEffect(() => {
    setValue((new Date()).toISOString().split('T')[0])
  }, [])

  return (
    <div className="w-100">
      <ReactDatePicker
        showIcon
        icon={icon || <i className="ph ph-calendar-blank text-sm mt-1"></i>}
        className="form-control"
        selected={date}
        onChange={(value, e) => onChangeHandler(value, e)}
        calendarContainer={Container}
        dateFormat={"dd-MM-yyyy"}
        isClearable
        disabled={disabled}
      />
      {
        error && (
          <p className="text-danger">{error}</p>
        )
      }
    </div>
  );
}
