import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { Auth } from '../../services/auth';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  imports: [FormsModule],
  templateUrl: './login.html',
  styleUrl: './login.css',
})
export class Login {
  email = '';
  password = '';

  constructor(private auth: Auth, private router: Router) {}

  login() {
    this.auth.login({
      email: this.email,
      password: this.password
    }).subscribe((res: any) => {

      // ✅ guardar correctamente
      this.auth.saveToken(res.access_token);
      this.auth.saveUser(res.user);

      // ✅ redirección correcta
      this.router.navigate(['/dashboard']);

    }, err => {
      alert('Credenciales incorrectas');
    });
  }
}