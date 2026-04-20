import { CommonModule } from '@angular/common';
import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-create-user',
  imports: [CommonModule, FormsModule],
  templateUrl: './create-user.html',
  styleUrl: './create-user.css',
})
export class CreateUser {
  public createUserData = {
    name: '',
    email: '',
    role: '',
    password: '',
  };

  createUser(createUserData: any) {
    // Aquí puedes agregar la lógica para enviar los datos al backend
    console.log('Creating user with data:', createUserData);
  }
}
