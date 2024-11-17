<div class="sidebar">
    <ul class="nav flex-column nav-pills">
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('home') || request()->is('/') ? 'active' : 'link-body-emphasis'  }}"
                href="{{route('home')}}"
            >
                <i class="bi bi-house-door me-2"></i>
                Home
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('employees.*') ? 'active' : 'link-body-emphasis' }}"
                href="{{route('employees.index')}}"
            >
                <i class="bi bi-briefcase me-2"></i>
                Employees
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('organisations.*') ? 'active' : 'link-body-emphasis'  }}"
                href="{{route('organisations.index')}}"
            >
                <i class="bi bi-briefcase me-2"></i>
                Organisations
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('animals.*') ? 'active' : 'link-body-emphasis'  }}"
                href="{{route('animals.index')}}"
            >
                <i class="bi bi-piggy-bank me-2"></i>
                Animals
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('breeds.*') ? 'active' : 'link-body-emphasis'  }}"
                href="{{route('breeds.index')}}"
            >
                <i class="bi bi-boxes me-2"></i>
                Breeds
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('events.*') ? 'active' : 'link-body-emphasis'  }}"
                href="{{route('events.index')}}"
            >
                <i class="bi bi-calendar4-event me-2"></i>
                Events
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('event-types.*') ? 'active' : 'link-body-emphasis'  }}"
                href="{{route('event-types.index')}}"
            >
                <i class="bi bi-calendar4-event me-2"></i>
                Event types
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('fields.*') ? 'active' : 'link-body-emphasis'  }}"
                href="{{route('fields.index')}}"
            >
                <i class="bi bi-calendar4-event me-2"></i>
                Fields
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('statuses.*') ? 'active' : 'link-body-emphasis'  }}"
                href="{{route('statuses.index')}}"
            >
                <i class="bi bi-check-circle me-2"></i>
                Statuses
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('roles.*') ? 'active' : 'link-body-emphasis'  }}"
                href="{{route('roles.index')}}"
            >
                <i class="bi bi-person me-2"></i>
                Roles
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('permissions.*') ? 'active' : 'link-body-emphasis'  }}"
                href="{{route('permissions.index')}}"
            >
                <i class="bi bi-person-lock me-2"></i>
                Permissions
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('users.*') ? 'active' : 'link-body-emphasis'  }}"
                href="{{route('users.index')}}"
            >
                <i class="bi bi-people me-2"></i>
                Users
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('dashboards.*') ? 'active' : 'link-body-emphasis'  }}"
                href="{{route('dashboards.index')}}"
            >
                <i class="bi bi-bar-chart"></i>
                Dashboards
            </a>
        </li>
        <li class="nav-item">
            <a
                class="nav-link {{ request()->routeIs('bolus-readings.*') ? 'active' : 'link-body-emphasis'  }}"
                href="{{route('bolus-readings.index')}}"
            >
                <i class="bi bi-bar-chart"></i>
                Bolus readings
            </a>
        </li>
    </ul>
</div>
