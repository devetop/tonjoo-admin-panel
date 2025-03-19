import Link from "next/link";

export default function Button(props) {
    const { href, text, btnClass = "bg-white text-primary", icon, iconClass = "bg-transparent", iconPos = "left" } = props;

    const renderIcon = () => (
        <i className={`icon w-10 h-10 flex items-center justify-center mr-2 ${iconClass}`}>{icon}</i>
    );

    return(
        <>
            <Link href={href} className={`button ${btnClass} rounded-full ${icon ? `py-2 pl-6 pr-2` : `py-4 px-8`} font-semibold border border-transparent inline-flex items-center shadow-lg hover:shadow-sm hover:opacity-80 duration-500`}>
                {icon && iconPos === 'left' && renderIcon()}
                <span>{text}</span>
                {icon && iconPos === 'right' && renderIcon()}
            </Link>
        </>
    );
};
