import React, { useState } from 'react';

const FormComponent = () => {
    const [user, setUser] = useState('');
    const [gender, setGender] = useState('');
    const [age, setAge] = useState('');
    const [equipment, setEquipment] = useState([{ name: '', picture: null }]);

    const handleInputChange = (index, event) => {
        const values = [...equipment];
        if (event.target.name === "picture") {
            values[index].picture = event.target.files[0];
        } else {
            values[index][event.target.name] = event.target.value;
        }
        setEquipment(values);
    };

    const handleAddFields = () => {
        setEquipment([...equipment, { name: '', picture: null }]);
    };

    return (
        <form>
            <label>
                User:
                <input type="text" value={user} onChange={e => setUser(e.target.value)} />
            </label>
            <label>
                Gender:
                <select value={gender} onChange={e => setGender(e.target.value)}>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </label>
            <label>
                Age:
                <input type="number" value={age} onChange={e => setAge(e.target.value)} />
            </label>
            {equipment.map((equip, index) => (
                <div key={`${equip}-${index}`}>
                    <h4>Equipment {index + 1}</h4>
                    <label>
                        Name:
                        <input type="text" name="name" value={equip.name} onChange={event => handleInputChange(index, event)} />
                    </label>
                    <label>
                        Picture:
                        <input type="file" name="picture" onChange={event => handleInputChange(index, event)} />
                    </label>
                </div>
            ))}
            <button type="button" onClick={() => handleAddFields()}>Add Equipment</button>
        </form>
    );
};

export default FormComponent;