import * as React from "react"

import { Input } from "../ui/input";
import { Label } from "../ui/label";
import { cn } from "@/lib/utils";
import { DEFAULT_PREVIEW_IMAGE_URL } from "@/config";
import Image from "next/image";
import { usePostPublicFileMutation } from "@/api/fileApi";
import { useController } from "react-hook-form"

const UploadImage = ({
    label,
    preview = (url, onClickHandler) => <Image src={url} width={960} height={720} alt="preview image" className="border rounded p-1 mb-1 " onClick={onClickHandler} />,
    defaultImageUrl = DEFAULT_PREVIEW_IMAGE_URL,
    uploadPath,
    error,
    className,
    name,
    control,
}, ref) => {
    const id = React.useId();
    const inputFileRef = React.useRef()
    const { field } = useController({ name, control, defaultValue: '' })
    const [imageUrl, setImageUrl] = React.useState(defaultImageUrl)
    const [postImage, { isLoading }] = usePostPublicFileMutation()

    const currentId = `${name}-${id}`;
    const fileUploadHandler = (e) => {

        const file = e.target.files[0]

        if (!file) return;

        const formData = new FormData()
        formData.append('file', file || '')

        postImage({
            data: formData,
            publicPath: uploadPath
        })
            .unwrap()
            .then(({ data }) => {
                setImageUrl(data.file_url_path)
                field.onChange(data.file_url_path)
            })
    }

    return (
        <div>
            <Label htmlFor={currentId}>{label}</Label>
            {preview(field.value || imageUrl, () => { inputFileRef.current.click() })}
            <Input
                id={currentId}
                className={cn(className, error ? 'border-red-500 focus-visible:ring-red-500' : '')}
                type={'text'}
                ref={ref}
                value={imageUrl === DEFAULT_PREVIEW_IMAGE_URL ? '' : imageUrl}
                name={name}
                {...field}
                readOnly
            />
            <input type="file" className="hidden" ref={inputFileRef} onChange={fileUploadHandler} />
            {
                error && <p className="mt-1 text-xs text-red-500">{error}</p>
            }
        </div>
    );
}

UploadImage.displayName = "UploadImage"


export { UploadImage }