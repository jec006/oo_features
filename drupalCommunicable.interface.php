<?

/**
 * DrupalCommunicable
 *
 * An interface encapsulating the methods needed to communicate a PHP class to 
 * and from a Drupal installation.
 */
interface DrupalCommunicable {
 
  /**
   *  This function should save the instance to the database
   */
  public function saveToDatabase();

  /**
   *  Compare this definition to the one in the database - should first ensure existence
   */
  public function diffToDatabase();

  /**
   *  Checks whether this instance exists already or not
   */
  public function exists();

  /**
   *  Remove this instance from the database
   */
  public function deleteFromDatabase(); 
}
