import { Component, OnInit } from '@angular/core';
import { Auth } from '../../services/auth';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-dashboard',
  imports: [CommonModule],
  templateUrl: './dashboard.html',
  styleUrl: './dashboard.css',
})
export class Dashboard implements OnInit {
   user!: any;

  constructor(private auth: Auth) {}

  ngOnInit(): void {
    this.user = this.auth.getUser();
  }

  logout(): void {
    this.auth.logout();
  }
}
