import TextInput from '../../../_component/TextInput';
import ImageInput from '../../../_component/ImageInput';
import { Link, usePage } from '@inertiajs/react';
import SelectInput from '../../../_component/SelectInput';
import CopyToClipboardText from '../../../_component/CopyToClipboardText';

export default function MediaForm({ type, data, setData, saveHandler, errors }) {

    const { users, statuses } = usePage().props
    const formDataChangeHandler = (e) => {

        if (e.target.type == 'file') {
            setData(e.target.name, e.target.files[0])
        } else {
            setData(e.target.name, e.target.value)
        }
    }

    return (
        <form onSubmit={saveHandler}>
            <div className="row justify-content-center">
                <div className="col-lg-9 mb-lg-0 mb-3">
                    <div className="card">
                        <div className="card-body">
                            
                            <div className="col">
                                <TextInput
                                    label="Title"
                                    name="title"
                                    value={data.title}
                                    onChangeHandler={formDataChangeHandler}
                                    error={errors.title}
                                />
                            </div>

                            {
                                (type == 'edit') && (
                                    <CopyToClipboardText text={data.old_image} />
                                )
                            }

                            <div className="col">
                                <ImageInput
                                    defaultImgUrl={data.media_image}
                                    name="media_image"
                                    label="Featured Image (960 x 720)"
                                    value={data.media_image}
                                    onChangeHandler={formDataChangeHandler}
                                    error={errors.media_image}
                                    defaultFilename={ (type == 'edit') ? data.content : '' }
                                />
                            </div>

                        </div>
                    </div>
                </div>

                <div className="col-lg-3">
                    <div className="card mb-3">
                        <div className="card-header">
                            <h5 className="card-title mb-0">Action</h5>
                        </div>
                        <div className="card-body">
                            <div className="row">
                                <div className="col">
                                    <Link
                                        href={route(`cms.media`)}
                                        className="btn btn-warning w-100"
                                    >
                                        Cancel
                                    </Link>
                                </div>
                                <div className="col">
                                    <button className="btn btn-primary w-100" type="submit">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="card mb-3">
                        <div className="card-body">

                            <SelectInput
                                label="Status"
                                name="status"
                                value={data.status}
                                onChangeHandler={formDataChangeHandler}
                                error={errors.status}
                                options={statuses.map((status) => ({
                                    value: status,
                                    text: status,
                                }))}
                            />

                            <SelectInput
                                label="Author"
                                name="author_id"
                                value={data.author_id}
                                onChangeHandler={formDataChangeHandler}
                                error={errors.author_id}
                                options={users.map((user) => ({
                                    value: user.id,
                                    text: user.name,
                                }))}
                            />

                            {
                                (type == 'edit') && (
                                    <p className="mb-0">
                                        {data.forhuman_updated_at}
                                    </p>
                                )
                            }

                        </div>
                    </div>
                </div>

            </div>
        </form>
    )
}