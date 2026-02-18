import java.util.*;
import java.io.*;
public class clinic {
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);

        while(true){

            System.out.println("\n===== CLINIC SYSTEM =====");
            System.out.println("1. Register");
            System.out.println("2. Login");
            System.out.println("3. Exit");
            System.out.println("\n=========================");
            System.out.print("Choose an option: ");
            String option = sc.nextLine();

            switch(option){
                case "1":
                    register(sc);
                    break;

                case "2":
                    // boolean loggedIn = login(sc);
                    // if(loggedIn){
                    //     clinicMenu(sc);
                    // }
                    // break;

                case "3":
                    System.out.println("Goodbye!");
                    System.exit(0);
                    break;

                default:
                    System.out.println("Invalid choice!");
            }
        }
    } 
    // =========REGISTER FUNCTION=========
    public static void register(Scanner sc){

        try {
            File file = new File("credentials.txt");
            if(!file.exists()){
                file.createNewFile();
            }

            System.out.print("Enter username: ");
            String username = sc.nextLine();

            System.out.print("Enter password: ");
            String password = sc.nextLine();

            if(username.isEmpty() || password.isEmpty()){
                System.out.println("Username and password cannot be empty!");
                return;
            }

            Scanner fileScanner = new Scanner(file);

            while(fileScanner.hasNextLine()){
                String line = fileScanner.nextLine();
                String[] parts = line.split(",");

                if(parts[0].equals(username)){
                    System.out.println("Username already exists!");
                    fileScanner.close();
                    return;

                }else if(parts[1].equals(password)){
                    System.out.println("Password already exists!");
                    fileScanner.close();
                    return;
                }
            }
            fileScanner.close();
            
            FileWriter writer = new FileWriter(file, true);
            writer.write(username + "," + password + "\n");
            writer.close();
            
            System.out.println("Registration successful!");

        }catch (Exception e) {
            System.out.println("Registration error!");
        }
    }
}