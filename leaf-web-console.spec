%define _build_id_links none
%define debug_package %{nil}

Summary:          Leaf Web Server Console
License:          LGPL
Name:             leaf-web-console
Version:          1.3
Release:          1

URL:              http://www.icapsql.com/
Source0:          %{name}-%{version}.tar.gz
BuildArch:        noarch

Requires:         httpd
BuildRequires:    systemd

%description 
The %{name} package contains the Leaf Web Server Console Program.

%prep
%setup -q -n %{name}-%{version}

%build

%install
[ -n "%{buildroot}" -a "%{buildroot}" != "/" ] && %{__rm} -rf %{buildroot}
%{__mkdir_p} %{buildroot}/var/www/html.leaf
%{__cp} -rf * %{buildroot}/var/www/html.leaf

%pre

%post

%preun

%postun

%files
%defattr(-,root,root)
%attr(750,apache,apache) %dir %{_localstatedir}/www/html.leaf/
%{_localstatedir}/www/html.leaf/*

%changelog
