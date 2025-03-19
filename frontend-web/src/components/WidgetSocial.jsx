import { ReactSVG } from "react-svg";
import Icons from "./Icons";
import Image from "next/image";
import Link from "next/link";


export default function WidgetContact(props) {
    const {content, className} = props;
    return(
        <>
            <ul className={`${className || ''}`}>
                {content.map((item, index) => (
                    <li key={index} className="mb-4 last:mb-0">
                        {item.link ? (
                            <Link href={item.link} className="flex items-start *:first:mr-3">
                                <Icons icon={item.icon} />
                                <span>{item.text}</span>
                            </Link>
                        ) : (
                            <span className="flex items-start *:first:mr-3">
                                <Icons icon={item.icon} />
                                <span>{item.text}</span>
                            </span>
                        )}
                    </li>
                ))}
            </ul>
        </>
    );
};
