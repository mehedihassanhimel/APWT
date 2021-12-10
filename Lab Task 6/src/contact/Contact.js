import React from 'react';

const Contact = (props) => {
    return (
        <div className="w-50 mx-auto  my-5 p-5 bg-primary bg-opacity-50 text-white">
            <h1>Email: {props.data.email}</h1>
            <h1>Phone: {props.data.phoneNumber}</h1>
            <h1>Address: {props.data.address}</h1>
        </div>
    );
};

export default Contact;