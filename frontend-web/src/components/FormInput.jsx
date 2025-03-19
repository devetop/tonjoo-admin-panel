export default function FormInput(props) {
    const {label, type = 'text', placeholder = 'Masukkan teks disini', id, className} = props;
    const classHtml = `border-[#E4E7EC] border-solid border py-4 px-5 w-full ${className || ''}`;
    return(
        <>
            <div className="relative">
                {label && (
                    <label className="block mb-3" htmlFor={id}>{label}</label>
                )}
                {
                    type === 'textarea' ? (
                        <textarea
                            id={id}
                            placeholder={placeholder}
                            className={classHtml}
                            rows={4}
                        ></textarea>
                    ) : (
                        <input
                            type={type}
                            placeholder={placeholder}
                            id={id}
                            className={classHtml}
                        />
                    )
                }
            </div>
        </>
    );
};
