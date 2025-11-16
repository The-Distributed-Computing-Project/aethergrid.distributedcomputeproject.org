---
category: Get Involved
nav_order : 4
layout : default
title : Join Waitlist
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

<div class="uicontainer">
<div class="container">
<h1>Join Our Waitlist</h1>
<p class="subtitle">Be the first to know when we launch</p>

<div id="messageBox" class="message"></div>

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

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        // Disable submit button
        submitBtn.disabled = true;
        submitBtn.textContent = 'Submitting...';
        
        // Hide previous messages
        messageBox.classList.remove('show', 'success', 'error');
        
        // Collect form data
        const formData = new FormData(form);
        formData.append('submit', '1');
        
        try {
            const response = await fetch('../tools/addtowaitlist.php', {
                method: 'POST',
                body: formData
            });
            
            const text = await response.text();
            
            // Check if the response indicates success
            if (text.includes('Data saved successfully')) {
                showMessage('success', 'Thank you! You\'ve been added to our waitlist.');
                form.reset();
            } else if (text.includes('error')) {
                // Try to extract error messages from the response
                const errorMessages = extractErrors(text);
                showMessage('error', errorMessages);
            } else {
                showMessage('error', 'An unexpected error occurred. Please try again.');
            }
            
        } catch (error) {
            showMessage('error', 'Network error. Please check your connection and try again.');
        } finally {
            // Re-enable submit button
            submitBtn.disabled = false;
            submitBtn.textContent = 'Join Waitlist';
        }
    });

    function showMessage(type, content) {
        messageBox.className = `message ${type} show`;
        if (typeof content === 'string') {
            messageBox.textContent = content;
        } else {
            messageBox.innerHTML = '<ul>' + content.map(err => `<li>${err}</li>`).join('') + '</ul>';
        }
    }

    function extractErrors(html) {
        // This is a simple extraction - you might need to adjust based on your PHP output
        const errors = [];
        if (html.includes('Name is required')) errors.push('Name is required');
        if (html.includes('Email is required')) errors.push('Email is required');
        if (html.includes('valid email')) errors.push('Please enter a valid email address');
        if (html.includes('Profession is required')) errors.push('Profession is required');
        
        return errors.length > 0 ? errors : ['Please fill in all required fields correctly.'];
    }
</script>
