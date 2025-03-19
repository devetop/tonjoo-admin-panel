import { ReactSVG } from "react-svg";

export default function Icons(props) {
    const {icon, path = '/assets/svgs', className = 'icon', size = 32} = props;
    const formatSize = (sizeValue) => {
        if (!isNaN(sizeValue)) {
            return `${sizeValue}px`;
        }
        return sizeValue;
    };
    return(
        <>
            <ReactSVG src={`${path}/${icon}.svg`} className={`${className || ''}`} style={{ '--size': formatSize(size) }}/>
        </>
    );
};
