import { SelectInput2 } from "../../../_component/SelectInput"
import TextInput from "../../../_component/TextInput"

const _defaultData = {
    nama: '',
    tipe: '',
    nominal: '',
}

const _options = [
    {
        value: 'gaji-pokok',
        label: 'Gaji Pokok',
    }, {
        value: 'tunjangan-performa',
        label: 'Tunjangan Performa',
    }, {
        value: 'tunjangan-proyek',
        label: 'Tunjangan Proyek',
    }, {
        value: 'bonus',
        label: 'Bonus',
    }
]
const _options2 = [
    {
        value: 'gaji',
        label: 'Gaji'
    }, {
        value: 'tunjangan',
        label: 'Tunjangan',
    }
]

export function CardRepeater({ 
    name, 
    value = [], 
    onChange, 
    defaultData = _defaultData, 
    options = _options, 
    options2 = _options2, 
    disabled = false,
    errors
}) {

    const onAddHandler = () => {
        onChange([...value, {...defaultData}])
    }
    const onChangeHandler = (name, _value, i) => {        
        const oldValues = [...value]
        oldValues[i][name] = _value
        onChange(oldValues)
    }
    const onDeleteHandler = (i) => {
        onChange(value.filter((v, _i) => i != _i))
    }

    return (
        <div className="card repeater">
            <div className="card-header py-2">
                <div className="row d-flex align-items-center">
                    <div className="col-6">
                        <h3 className="card-title text-capitalize">{name}</h3>
                    </div>
                    {
                        !disabled && (
                            <div className="col-6 text-right">
                                <button type="button" className="btn btn-sm btn-default" onClick={onAddHandler}>
                                    <i className="ph ph-plus"></i> Tambah
                                </button>
                            </div>
                        )
                    }
                </div>
            </div>
            <div className="card-body">
                <table className="table table-compact table-bordered table-flush table-main align-items-center">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tipe</th>
                            <th>Nominal</th>
                            {
                                !disabled && <th width="20"></th>
                            }
                        </tr>
                    </thead>
                    <tbody data-repeater-list="pendapatan">
                        {
                            value.map((item, i) => (
                                <tr data-repeater-item="" key={i}>
                                    <td>
                                        <SelectInput2
                                            value={item.nama}
                                            onChangeHandler={(v) => onChangeHandler('nama', v.value, i)}
                                            options={options}
                                            disabled={disabled}
                                            error={errors[`${name}.${i}.nama`]}
                                        />
                                    </td>
                                    <td>
                                        <SelectInput2
                                            value={item.tipe}
                                            onChangeHandler={(v) => onChangeHandler('tipe', v.value, i)}
                                            options={options2}
                                            disabled={disabled}
                                            error={errors[`${name}.${i}.tipe`]}
                                        />
                                    </td>
                                    <td>
                                        <TextInput
                                            type='number' 
                                            value={item.nominal} 
                                            onChangeHandler={(e) => onChangeHandler('nominal', e.target.value, i)}
                                            inputProps={{disabled}}
                                            error={errors[`${name}.${i}.nominal`]}
                                        />
                                    </td>
                                    {
                                        !disabled && (
                                            <td>
                                                <button type="button" className="btn btn-sm btn-outline-danger" onClick={() => onDeleteHandler(i)}>
                                                    <i className="ph ph-trash"></i>
                                                </button>
                                            </td>
                                        )
                                    }
                                </tr>
                            ))
                        }
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colSpan="2">Total Pendapatan Kotor</th>
                            <th>Rp <span className="total">{ value?.reduce((carry, item) => carry + parseFloat(item.nominal || 0), 0) }</span></th>
                            {
                                !disabled && <th></th>
                            }
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    )
}