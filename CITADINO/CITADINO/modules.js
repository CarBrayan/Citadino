function handleAuth() {
    const email = document.getElementById('auth-email').value;
    const password = document.getElementById('auth-password').value;

    if (isRegisterMode) {
        // Usamos el método addUser de la clase Database
        const result = userDB.addUser("Cliente", email, password); 
        
        if (result.success) {
            alert('✅ Registro exitoso! Ahora puedes Iniciar Sesión.');
            toggleAuthMode();
        } else {
            alert('❌ ' + result.message);
        }
    } else {
        // Usamos el método findUserByCredentials
        const user = userDB.findUserByCredentials(email, password); 
        
        if (user) {
            currentUser = user;
            sessionStorage.setItem('currentUser', JSON.stringify(currentUser)); 
            updateUIForAuth();
            closeAuthModal();
            alert(`¡Bienvenido de nuevo, ${currentUser.name.split(' ')[0]}!`);
            
            if (document.getElementById('cart').dataset.checkoutPending === 'true') {
                document.getElementById('cart').dataset.checkoutPending = 'false';
                iniciarCompra(true); 
            }

        } else {
            alert('❌ Credenciales inválidas o usuario no registrado.');
        }
    }
}
