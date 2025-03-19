/**
 * Digunakan untuk membuat tombol.
 *
 * @param {string} color - Jenis tombol ('primary', 'secondary', 'danger', 'info', 'default').
 * @param {string} size - Ukuran tombol ('lg', 'sm').
 * @returns {JSX.Element} Komponen Button yang telah di-render.
 */
export default function Button({
  color = "default",
  size = '',
  className = '',
  ...props
}) {
  return (
    <button
      className={`btn btn-${color} ${size && `btn-${size}`} ${className}`}
      type={props.type || 'button'}
      {...props}
    >
      {props.children}
    </button>
  );
}
