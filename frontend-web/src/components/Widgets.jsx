import Image from "next/image";
import WidgetContact from "./WidgetContact";
import WidgetSocial from "./WidgetSocial";
import WidgetSubscribe from "./WidgetSubscribe";

export default function Widgets(props) {
    const { title, desc, image, type = 'text', content, className="" } = props;
    const widgetType = "widget-" . type;    
    
    function renderWidget(type, content) {
        switch (type) {
            case 'contact':
                return <WidgetContact content={content} className="mt-4" />;
            case 'social':
                return <WidgetSocial content={content} className="mt-6" />;
            case 'subscribe':
                return (
                    <>
                        <WidgetSubscribe className="my-6" />
                        {content}
                    </>
                );
            default:
                return <>{content}</>;
        }
    }

    return(
        <>
            <div className={`widget widget-${type || ''} ${className || ''}` }>
                {image && (
                    <Image 
                        src={image}
                        width={100}
                        height={100}
                        className="mb-8 object-contain h-10 w-auto"
                        alt={''}
                    />
                )}

                {title && (
                    <h3 className="uppercase font-bold mb-3 text-lg">{title}</h3>
                )}

                {desc && (
                    <div className="*:last-of-type:mb-0">
                        {desc}
                    </div>
                )}

                {renderWidget(type, content)}

            </div>
            
        </>
    );
    
};
