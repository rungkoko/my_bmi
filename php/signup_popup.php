<style>
    /* ตัวอย่างการปรับแต่งสไตล์ form-group */
.form-group {
    margin-bottom: 20px;
}

/* ตัวอย่างการปรับแต่งสไตล์ปุ่ม Register */
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

/* สไตล์สำหรับเลือก Gender */
#gender {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: #fff;
    color: #333;
    transition: border-color 0.2s, box-shadow 0.2s;
}

/* สไตล์เมื่อโฮเวอร์เลือก Gender */
#gender:hover {
    border-color: #007bff;
}

/* สไตล์เมื่อคลิกเลือก Gender */
#gender:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    outline: none;
}

/* สไตล์สำหรับตัวเลือกของ Gender */
#gender option {
    background-color: #fff;
    color: #333;
}

/* สไตล์เมื่อโฮเวอร์ตัวเลือกของ Gender */
#gender option:hover {
    background-color: #007bff;
    color: #fff;
}

</style>
<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">signup</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="post" action="php/register.php">
            <label for="username">Username:</label>
<input type="text" class="form-control" id="username" name="username" required placeholder="Enter your username"><br>

<label for="password">Password:</label>
<input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password"><br>

<label for="confirmpassword">Confirm Password:</label>
<input type="password" class="form-control" id="confirmpassword" name="confirmpassword" required placeholder="Confirm your password"><br>

<label for="gender">Gender:</label>
<select id="gender" name="gender" required>
    <option value="" disabled selected>Select your gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
</select><br><br>

<label for="firstName">First Name:</label>
<input type="text" class="form-control" id="firstName" name="firstName" required placeholder="Enter your first name"><br>

<label for="lastName">Last Name:</label>
<input type="text" class="form-control" id="lastName" name="lastName" required placeholder="Enter your last name"><br>

<label for="birthday">Birthday:</label>
<input type="date" class="form-control" id="birthday" name="birthday" required><br>

<label for="email">Email:</label>
<input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email"><br>

<label for="address">Address:</label>
<textarea id="address" class="form-control" name="address" required placeholder="Enter your address"></textarea><br>

<label for="phonenumber">Phone Number:</label>
<input type="tel" class="form-control" id="phonenumber" name="phonenumber" required placeholder="Enter your phone number"><br>


        <input type="submit" class="btn btn-primary" value="Register" >
    </form>
    
            </div>
        </div>
    </div>