import { Component, OnInit } from '@angular/core';
import { Auth } from '../../services/auth';
import { CommonModule } from '@angular/common';
import { Router } from '@angular/router';

@Component({
  selector: 'app-dashboard',
  imports: [CommonModule],
  templateUrl: './dashboard.html',
  styleUrl: './dashboard.css',
})
export class Dashboard implements OnInit {
   user!: any;

  constructor(private auth: Auth, private router: Router) {}

  ngOnInit(): void {
    this.user = this.auth.getUser();
  }

  logout(): void {
    this.auth.logout();
  }

  view: string = 'home';

  goToCreateUser() {
    this.router.navigate(['/create-user']);
  }
}
