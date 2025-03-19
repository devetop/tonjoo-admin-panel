export default function HeadSection(props) {
    const {title, desc, width = '400px', className = null} = props;
    
    return(
        <>
            <div className={`text-center max-w-[${width}] mx-auto mb-10 lg:mb-16 ${className || ''}`}>
                <h3 className="text-3xl font-bold uppercase mb-2">{title}</h3>
                {desc && (
                    <p className="mb-0">{desc}</p>
                )}
            </div>
        </>
    );    
};
