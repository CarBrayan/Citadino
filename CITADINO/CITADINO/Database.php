// CREAR (Registrar un nuevo usuario/cliente)
    addUser(name, email, password, address, phone, birthdate) { // <-- Se agregaron argumentos
        if (this.records.some(u => u.email === email)) {
            return { success: false, message: 'El correo ya está registrado.' };
        }
        
        // Creamos una instancia de User con todos los datos
        const newUser = new User(this.nextId++, name, email, password, address, phone, birthdate);
        this.records.push(newUser);
        this.saveRecords();
        
        return { success: true, user: newUser };
    }