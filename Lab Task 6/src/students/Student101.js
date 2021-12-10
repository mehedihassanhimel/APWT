import React from 'react';
import {NavLink} from "react-router-dom";

const Student = (props) => {
    let state=props.student;


    return (
        <div className="p-5 m-3 w-25 bg-primary bg-opacity-50 text-white">
            <h3>Name : {props.student.first_name} </h3>
            <h3>Last Name : {props.student.last_name}</h3>
            <NavLink className="btn btn-dark" to={`/students/${props.student.id}`} state={state} >view more info</NavLink>

        </div>
    );
};

export default Student;