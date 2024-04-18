import { Box, Button, TextField, Typography } from '@mui/material'
import React, { useState } from 'react'
import { Link } from 'react-router-dom'
import $ from 'jquery'
import { register } from '../api/auth'
import { toast } from 'react-toastify'

export default function Register() {

    const [warnings, setWarnings] = useState({})

    const onSubmit = (e) => {
        e.preventDefault()
        const body = {
            name: $("#name").val(),
            email: $("#email").val(),
            password: $("#password").val(),
            password_confirmation: $("#password_confirmation").val(),
            first_name: $("#first_name").val(),
            last_name: $("#last_name").val(),
            middle_name: $("#middle_name").val(),
            birth_date: $("#birth_date").val()
        }

        register(body).then(res => {
            if(res?.ok){
                toast.success(res?.message ?? "Account has been registered")
            }else{
                toast.error(res?.message ?? "Something went wrong.")
            }
        })
    }
  return (
    <Box sx={{minHeight: '100vh', display: 'flex', justifyContent: 'center', alignItems:  'center'}}>
        <Box sx={{height: 550, width: 500, boxShadow: 'black 0px 0px 20px', borderRadius: 2}}>
            <Typography variant="h4" sx={{textAlign: 'center', mt: 2}}>
                Register

            </Typography>
            <Box component="form" onSubmit={onSubmit} sx={{width: 300, mx: 'auto'}}>
                <Box sx={{mt: 1}}>
                    <TextField required id="name" fullWidth size="small" label="Username" />
                </Box>
                <Box sx={{mt: 1}}>
                    <TextField required id="email" fullWidth size="small" label="Email" type="email"/>
                </Box>
                <Box sx={{mt: 1}}>
                    <TextField required id="password" fullWidth size="small" label="Password" type="password"/>
                </Box>
                <Box sx={{mt: 1}}>
                    <TextField required id="password_confirmation" fullWidth size="small" label="Repeat Password" type="password"/>
                </Box>
                <Box sx={{mt: 1}}>
                    <TextField required id="first_name" fullWidth size="small" label="First Name" />
                </Box>
                <Box sx={{mt: 1}}>
                    <TextField required id="last_name" fullWidth size="small" label="Last Name" />
                </Box>
                <Box sx={{mt: 1}}>
                    <TextField id="middle_name" fullWidth size="small" label="Middle Name" />
                </Box>
                <Box sx={{mt: 1}}>
                    <TextField required id="birth_date" fullWidth size="small" type="date" />
                </Box>
                <Box sx={{mt: 1, textAlign: 'center'}}>
                    <Button type="submit" variant="contained">Login</Button>
                </Box>
            </Box>
            <Box sx={{mt: 2, textAlign: 'center'}}>
            <Link to="/login">
                <Typography>
                    Already have an account
                </Typography>
            </Link> 
            </Box>
        </Box>
    </Box>
  )
}
