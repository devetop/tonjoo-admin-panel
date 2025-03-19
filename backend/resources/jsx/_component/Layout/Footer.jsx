import React from 'react';

function SidebarRight() {
    return (
        <aside className="control-sidebar control-sidebar-dark" style={{display: 'block'}}>
            <div className="p-3 control-sidebar-content">
            <h5>Demo Options</h5>
            <hr className="mb-2" />
            <h6>Amanah Skins ( Body Class )</h6>
            <select className="custom-select mb-3 border-0">
                <option>None Selected</option>
                <option className="skin-backend-1">Skin backend-1</option>
                <option className="skin-backend-2">Skin backend-2</option>
                <option className="skin-backend-3">Skin backend-3</option>
                <option className="skin-backend-4">Skin backend-4</option>
                <option className="skin-backend-5">Skin backend-5</option>
                <option className="skin-backend-6">Skin backend-6</option>
                <option className="skin-frontend-1">Skin frontend-1</option>
                <option className="skin-frontend-2">Skin frontend-2</option>
                <option className="skin-frontend-3">Skin frontend-3</option>
                <option className="skin-frontend-4">Skin frontend-4</option>
                <option className="skin-frontend-5">Skin frontend-5</option>
            </select>
            </div>
        </aside>
    )
}

export default function Footer() {
    return (
        <>
            <footer className="main-footer">
                <strong>Copyright © 2023 Amanah Tonjoo Admin Panel <span style={{ display: 'inline-block' }}>( Amanah TAP )</span> v3.</strong>
                All rights reserved.
                <div className="float-right d-none d-sm-inline-block">
                    <strong><a href="https://adminlte.io/docs/3.2/" target="_blank">Based AdminLTE.io v3.2.0</a></strong>
                </div>
            </footer>
        </>
    )
}