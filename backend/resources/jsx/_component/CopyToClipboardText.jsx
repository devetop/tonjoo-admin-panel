import './copyToClipboardText.scss';

export default function CopyToClipboardText({ text }) {
    return (
        <a
            className="btn btn-sm btn-link btn-icon-clipboard text-sm p-2"
            data-toggle="tooltip"
            data-placement="top"
            title="Copy to Clipboard"
            onClick={() => navigator.clipboard.writeText(text)}
        >
            <i className="fa fa-clipboard text-right mr-1"></i>
            {text}
        </a>
    )
}