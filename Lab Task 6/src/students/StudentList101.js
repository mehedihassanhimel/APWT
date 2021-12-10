import React, {useEffect, useState} from 'react';
import students from "./Students";
import Students from "./Students";

const StudentList = () => {
    const data=[{
        "id": 1,
        "first_name": "Jacquelynn",
        "last_name": "Rene",
        "email": "jrene0@drupal.org",
        "gender": "Female"
    }, {
        "id": 2,
        "first_name": "Homer",
        "last_name": "Prydie",
        "email": "hprydie1@webeden.co.uk",
        "gender": "Male"
    }, {
        "id": 3,
        "first_name": "Robina",
        "last_name": "Tummons",
        "email": "rtummons2@dagondesign.com",
        "gender": "Female"
    }, {
        "id": 4,
        "first_name": "Rafaelita",
        "last_name": "Ankrett",
        "email": "rankrett3@blinklist.com",
        "gender": "Female"
    }, {
        "id": 5,
        "first_name": "Donella",
        "last_name": "Dubery",
        "email": "ddubery4@vinaora.com",
        "gender": "Male"
    }, {
        "id": 6,
        "first_name": "Tiffani",
        "last_name": "Signori",
        "email": "tsignori5@miibeian.gov.cn",
        "gender": "Female"
    }, {
        "id": 7,
        "first_name": "Prue",
        "last_name": "Conklin",
        "email": "pconklin6@list-manage.com",
        "gender": "Male"
    }, {
        "id": 8,
        "first_name": "Charmion",
        "last_name": "McIllrick",
        "email": "cmcillrick7@jiathis.com",
        "gender": "Male"
    }, {
        "id": 10,
        "first_name": "Ardyth",
        "last_name": "Edgecombe",
        "email": "aedgecombe9@cargocollective.com",
        "gender": "Female"
    }]

    const [studentList,setStudentList]=useState([]);
    useEffect(()=>{
        setStudentList(data);
    },[]);


    return (
        <div>
            <Students studentList={studentList} />

        </div>
    );
};

export default StudentList;