import React from 'react';
import Logol from '../../assets/logodcnew.png'
import './style.css';

function Header() {
    return (
        <div className="Container_nav">
            <nav className="navbar_left">
                <div className="container_logo">
                    <img src={Logol} class="img-fluid" alt="..." />
                </div>
                <ul class="nav flex-column nav-left">
                    <li class="nav-item button-item">
                        <a class="nav-link" href="/">Listagem dos Contratos</a>
                    </li>
                    <li class="nav-item button-item">
                        <a class="nav-link" href="/emprestimos">Criar Contrato</a>
                    </li>
                </ul>
            </nav>
        </div>
    )
}

export default Header