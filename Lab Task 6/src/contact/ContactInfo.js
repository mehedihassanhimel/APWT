import React,{useState,useEffect} from 'react';
import Contact from "./Contact";

const ContactInfo = () => {
    const info={
        "email" : "abcd@gmail.com",
        "phoneNumber" : "01866515520",
        "address" : "408/1, Kuratoli, Dhaka 1229"
    }
    const [contactInfo,setContactInfo]=useState({});
    useEffect(()=>{
      setContactInfo(info);
    },[])
    return (
        <div>
            <Contact data={contactInfo}/>
        </div>
    );
};

export default ContactInfo;