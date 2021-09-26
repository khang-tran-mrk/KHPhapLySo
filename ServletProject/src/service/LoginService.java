package service;

import dao.LoginDao;

public class LoginService {
	LoginDao loginDao = new LoginDao();
	
	public boolean login(String username, String password) {
		return loginDao.login(username, password);
	}
}
