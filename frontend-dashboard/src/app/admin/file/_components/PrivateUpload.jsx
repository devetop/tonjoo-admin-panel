import { usePostPrivateFileMutation } from "@/api/fileApi"
import { InputWithError } from "@/components/molecules/InputWithError"
import { Button } from "@/components/ui/button"
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card"
import Image from "next/image"
import { useForm } from "react-hook-form"

export default function PrivateUpload() {

    const { register, handleSubmit } = useForm({
        defaultValues: {
            file: ''
        }
    })

    const [postProvateFile, { error, data }] = usePostPrivateFileMutation()

    const onSubmitHandler = async (data) => {
        const file = data.file[0]
        const formData = new FormData()
        formData.append('file', file || '')
        await postProvateFile({ data: formData })
    }

    return (
        <Card>
            <CardHeader className={'border-b px-6 py-[14px] bg-head'}>
                <CardTitle className='text-p2'>Private File</CardTitle>
            </CardHeader>
            <CardContent className='p-6'>
                <form onSubmit={handleSubmit(onSubmitHandler)}>
                    <InputWithError
                        type="file"
                        label="Private File"
                        {...register('file')}
                        error={error?.errors?.file}
                    />

                    {
                        data?.data?.file_url_path && (
                            <div className="max-w-[200] text-wrap">
                                <Image className="border p-1 rounded mx-auto" src={data?.data?.file_url_path} width={210} height={70} alt="private image preview" unoptimized />
                                <p>uploaded fileurl: {data?.data?.file_url_path}</p>
                            </div>
                        )
                    }

                    <div className="text-right mt-6">
                        <Button>Sumbit</Button>
                    </div>
                </form>
            </CardContent>
        </Card>
    )
}