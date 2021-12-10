import React from 'react';
import {useParams, useLocation, NavLink} from "react-router-dom";

const StudentData = () => {
    const id=useParams();
    const data=useLocation();
    console.log(data);
    return (
        <div className="w-50 mx-auto  my-5 p-5 bg-primary bg-opacity-50 text-white">
            <h1>First Name : {data.state.first_name}</h1>
            <h1>Last Name : {data.state.last_name}</h1>
            <h1>Email : {data.state.email}</h1>
            <h1>Gender : {data.state.gender}</h1>
            <NavLink className="btn btn-primary px-3 py-2 w-25" to="/students">Go Back</NavLink>
        </div>
    );
};

export default StudentData;