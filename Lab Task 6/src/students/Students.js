import React, {useState, useEffect} from 'react';
import Student from "./Student";


const Students = (props) => {

    return (
        <div className="d-flex justify-content-around flex-wrap">
            {props.studentList.map((student)=><Student key={student.id} student={student}/>)}
        </div>
    );
};

export default Students;