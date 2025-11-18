---
category: Get Involved
nav_order : 4
layout : default
title : Join Waitlist
nav_highlight: true
---

<style>
    .uicontainer {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        min-height: 60vh;
        padding: 20px;
    }

    .container {
        background: #1a1a1a;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        max-width: 450px;
        width: 100%;
    }

    h1 {
        color: #ffffff;
        margin-bottom: 10px;
        font-size: 28px;
    }

    .subtitle {
        color: #b0b0b0;
        margin-bottom: 30px;
        font-size: 14px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #e0e0e0;
        font-weight: 500;
        font-size: 14px;
    }

    input, select {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #333333;
        border-radius: 6px;
        font-size: 14px;
        background: #2a2a2a;
        color: #ffffff;
        transition: border-color 0.3s;
        box-sizing: border-box;
    }

    input:focus, select:focus {
        outline: none;
        border-color: #667eea;
        background: #2f2f2f;
    }

    input::placeholder {
        color: #666666;
    }

    button {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(102, 126, 234, 0.4);
    }

    button:active {
        transform: translateY(0);
    }

    button:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }

    .message {
        padding: 12px 15px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 14px;
        display: none;
    }

    .message.show {
        display: block;
        animation: slideIn 0.3s ease;
    }

    .message.success {
        background-color: #1e4620;
        color: #6fd76f;
        border: 1px solid #2d5f2f;
    }

    .message.error {
        background-color: #4a1f1f;
        color: #ff6b6b;
        border: 1px solid #6b2c2c;
    }

    .message ul {
        margin-left: 20px;
        margin-bottom: 0;
    }

    .already-registered {
        text-align: center;
        color: #6fd76f;
    }

    .already-registered p {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .already-registered .subtitle {
        color: #b0b0b0;
    }

    .hidden {
        display: none !important;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="uicontainer">
<div class="container">
<h1>Join Our Waitlist</h1>
<p class="subtitle">Be the first to know when we launch</p>

<div id="messageBox" class="message"></div>

<div id="alreadyRegistered" class="already-registered hidden">
    <p>✓ You're already on the waitlist!</p>
    <p class="subtitle">We'll notify you when we launch.</p>
</div>

<form id="waitlistForm">
<div class="form-group">
    <label for="name">Full Name *</label>
    <input type="text" id="name" name="name" required>
</div>

<div class="form-group">
    <label for="email">Email Address *</label>
    <input type="email" id="email" name="email" required>
</div>

<div class="form-group">
    <label for="profession">Profession *</label>
    <input type="text" id="profession" name="profession" required>
</div>

<button type="submit" id="submitBtn">
    Join Waitlist
</button>
</form>
</div>
</div>

<script>
    const form = document.getElementById('waitlistForm');
    const messageBox = document.getElementById('messageBox');
    const submitBtn = document.getElementById('submitBtn');
    const alreadyRegistered = document.getElementById('alreadyRegistered');
    
    const STORAGE_KEY = 'waitlist_submitted';

    function checkIfAlreadySubmitted() {
        const submitted = localStorage.getItem(STORAGE_KEY);
        if (submitted === 'true') {
            form.classList.add('hidden');
            alreadyRegistered.classList.remove('hidden');
            return true;
        }
        return false;
    }

    checkIfAlreadySubmitted();

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        console.log('Form submitted');
        
        submitBtn.disabled = true;
        submitBtn.textContent = 'Submitting...';
        
        messageBox.classList.remove('show', 'success', 'error');
        
        const formData = new FormData(form);
        formData.append('submit', '1');
        
        console.log('Sending data to server...');
        
        fetch('../tools/addtowaitlist.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            console.log('Response status:', response.status);
            return response.text();
        })
        .then(text => {
            console.log('Response text:', text);
            
            let data;
            try {
                data = JSON.parse(text);
                console.log('Parsed JSON:', data);
            } catch (e) {
                console.error('JSON parse error:', e);
                if (text.includes('Data saved successfully')) {
                    showMessage('success', 'Thank you! You\'ve been added to our waitlist.');
                    form.reset();
                    localStorage.setItem(STORAGE_KEY, 'true');
                    
                    setTimeout(() => {
                        form.classList.add('hidden');
                        alreadyRegistered.classList.remove('hidden');
                        messageBox.classList.remove('show');
                    }, 2000);
                    return;
                } else {
                    showMessage('error', 'An unexpected error occurred. Please try again.');
                    console.error('Response was not JSON:', text);
                    return;
                }
            }
            
            if (data.success) {
                showMessage('success', 'Thank you! You\'ve been added to our waitlist.');
                form.reset();
                localStorage.setItem(STORAGE_KEY, 'true');
                
                setTimeout(() => {
                    form.classList.add('hidden');
                    alreadyRegistered.classList.remove('hidden');
                    messageBox.classList.remove('show');
                }, 2000);
            } else if (data.errors && data.errors.length > 0) {
                showMessage('error', data.errors);
            } else {
                showMessage('error', 'An unexpected error occurred. Please try again.');
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);
            showMessage('error', 'Network error. Please check your connection and try again.');
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Join Waitlist';
        });
        
        return false;
    });

    function showMessage(type, content) {
        messageBox.className = `message ${type} show`;
        if (typeof content === 'string') {
            messageBox.textContent = content;
        } else {
            messageBox.innerHTML = '<ul>' + content.map(err => `<li>${err}</li>`).join('') + '</ul>';
        }
    }
</script>
