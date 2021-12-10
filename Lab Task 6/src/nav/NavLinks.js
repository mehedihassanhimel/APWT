import React from 'react';
import {NavLink} from "react-router-dom";

const NavLinks = () => {
    return (
        <div className="mx-auto w-50 d-flex justify-content-around my-3">
            <NavLink className="btn btn-primary px-3 py-2 w-25" to="/">Home</NavLink>
            <NavLink className="btn btn-primary px-3 py-2 w-25" to="/contact">Contact</NavLink>
            <NavLink className="btn btn-primary px-3 py-2 w-25" to="/students">Student List</NavLink>

        </div>
    );
};

export default NavLinks;